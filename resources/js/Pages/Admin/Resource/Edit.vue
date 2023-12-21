<script setup>
import AdminAuthenticatedLayout from '@/Layouts/AdminAuthenticatedLayout.vue';
import {router, useForm} from '@inertiajs/vue3';
import Button from "@/Components/Button.vue";
import {Head} from '@inertiajs/vue3';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import InputLabel from "@/Components/InputLabel.vue";
import {ref} from "vue";

const $toast = useToast();


const props = defineProps({
	errors: Object,
	resource: Object,
	users: Object
});

console.log(props.users);

const previewUrl = ref(props.resource.image);

const form = useForm({
	title: props.resource.title,
	type: props.resource.type,
	url: props.resource.url,
	status: props.resource.status,
	image: props.resource.image,
	user_id: props.resource.user_id,
});

const uploadImage = (event) => {
	const file = event.target.files[0];
	form.image = file;

	// const file = event.target.files[0];
	if (file) {
		const reader = new FileReader();

		reader.onload = (e) => {
			previewUrl.value = e.target.result;
		};

		reader.readAsDataURL(file);
	} else {
		previewUrl.value = '';
	}
};

function submit(id) {
	// router.put(route('resource.update', id), form);

	form.post(route('resource.update', id), {
		preserveScroll: true,
		onSuccess: (page) => {
			$toast.open({
				message: 'Resource Updated Successfully!',
				type: 'success',
				position: 'top-right',
				duration: 5000,
				style: {
					background: 'linear-gradient(to right, #00b09b, #96c93d)',
				},
			});
		},
		onError: (errors) => {
			$toast.open({
				message: 'All fields are required!',
				type: 'error',
				position: 'top-right',
				duration: 5000,
				style: {
					background: 'linear-gradient(to right, #FF0000, #FF6347)',
				},
			});
		}
	})
}


</script>

<template>
	<Head title="Edit Resource"/>

	<AdminAuthenticatedLayout>
		<template #header>
			<h1 class="font-bold text-dm-heading-color text-4xl">Edit Resource</h1>
		</template>

		<div class="py-8">
			<div class="">
				<div class="flex gap-2 mb-6">
					<Button :href="route('resource.index')" :active="route().current('resource.index')">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15.8327 10H4.16602" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M9.99935 15.8333L4.16602 9.99999L9.99935 4.16666" stroke="#566474" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						Go back
					</Button>
				</div>
			</div>

			<div class="flex flex-col">
				<form @submit.prevent="submit(resource.id)"
				      class="border border-[#F2F3F3] p-5 rounded-2xl max-w-[850px]" enctype="multipart/form-data">
					<div class="dm-input-field">
						<label for="title-1" class="dm-input-field__label block">Title</label>
						<input type="text" name="title" id="title-1" v-model="form.title" class="dm-input-field__input w-full">
						<div class="text-red-500" v-if="errors.title">{{ errors.title }}</div>
					</div>


					<div class="dm-input-field">
						<InputLabel for="Position" value="Content Type*" class="mb-2"/>

						<div class="form-check mr-2 inline-flex items-center gap-1">
							<input type="radio" id="type_video" name="type" v-model="form.type" value="video" class="form-check-input">
							<label for="type_video" class="form-check-label dmb-0 leading-none">Video</label>
						</div>
						<div class="form-check mr-2 inline-flex items-center gap-1">
							<input type="radio" id="type_article" name="type" v-model="form.type" value="article" class="form-check-input">
							<label for="type_article" class="form-check-label dmb-0 leading-none">Article</label>
						</div>
						<div class="form-check mr-2 inline-flex items-center gap-1">
							<input type="radio" id="type_book" name="type" v-model="form.type" value="book" class="form-check-input">
							<label for="type_book" class="form-check-label dmb-0 leading-none">Book</label>
						</div>
						<div class="text-red-500" v-if="errors.type">{{ errors.type }}</div>

						<!-- Profile Image-->
						<div class="dm-input-field dm-preview-image mt-6 relative">
							<label for="profile-image" class="dm-input-field__label block mb-3">Thumbnail</label>
							<img :src="previewUrl" v-if="previewUrl" alt="Preview" class="w-[250px]"/>
							<span v-else>
                            <img :src="previewUrl" alt="Placeholder" class="w-[100px]"/>
                        </span>

							<div class="dm-input-field__file-remove absolute top-[50px] right-[20px] bg-red-200 rounded p-1" v-if="previewUrl" @click="removeImage">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
								</svg>
							</div>
						</div>
						<div class="dm-input-field">
							<input type="file" id="profile-image" name="profile_image" @change="uploadImage" class="dm-input-field__file">
							<div class="text-red-500" v-if="errors.image">{{ errors.image }}</div>
						</div>

						<div class="dm-input-field">
							<label for="status" class="dm-input-field__label block">Status</label>
							<select name="status" id="status" v-model="form.status" class="dm-input-field__input w-full">
								<option value="">Select Status</option>
								<option value="approved">Public</option>
								<option value="draft">Draft</option>
								<option value="rejected">Rejected</option>
							</select>
							<div class="text-red-500" v-if="errors.status">{{ errors.status }}</div>
						</div>


						<div class="dm-input-field">
							<label for="status" class="dm-input-field__label block">Author</label>
							<select name="user_id" id="user_id" v-model="form.user_id" class="dm-input-field__input w-full">
								<option value="">Select Author</option>
								<option v-for="user in users" :key="user.id" :value="user.id">
									{{ user.name }}
								</option>
							</select>
							<div class="text-red-500" v-if="errors.user_id">{{ errors.user_id }}</div>
						</div>

						<div class="dm-input-field">
							<label for="radio-1" class="dm-input-field__label block">URL <span class="text-red-300">*</span></label>
							<input type="text" name="url" id="url" v-model="form.url" class="dm-input-field__input w-full">
							<div class="text-red-500" v-if="errors.url">{{ errors.url }}</div>
						</div>
					</div>

					<div class="dm-input-field">
						<button type="submit" class="dm-btn dm-button--primary">Update</button>
					</div>

				</form>
			</div>

		</div>
	</AdminAuthenticatedLayout>
</template>

<style scoped>

</style>
