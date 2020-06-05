<template>
<div class="container p-5 white">
	<div class="row mb-4">
		<div class="col-6">
			<h4><b>Загрузка документа</b></h4>
		</div>
		<div class="col-6 text-right mt-1 ">Шаг 1</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
				</div>
				<div class="custom-file">
					<input type="file" id="file" ref="file" v-on:change="handleFileUpload()" class="custom-file-input " aria-describedby="inputGroupFileAddon01">
					<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-4">
		<div class="col text-right">
			<button type="button" @click="submitFile()" class="btn btn-primary" name="button">Далее</button>
		</div>
	</div>
</div>
</template>

<script>
export default {
	mounted() {
		// console.log('Component mounted.')
	},
	data() {
		return {
			file: ''
		}
	},
	methods: {
		submitFile() {
			let formData = new FormData();
			formData.append('file', this.file);
			axios.post('/fileuploads',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}
				).then(res => {
					console.log(res.data);
				})
				.catch(function() {
					console.log('FAILURE!!');
				});
		},
		handleFileUpload() {
			this.file = this.$refs.file.files[0];
		}
	}
}
</script>
