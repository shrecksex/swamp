<template>
<div class="container p-5 white d-zepth-2">
	<div class="row mb-4">
		<div class="col-6">
			<h4><b>Загрузка документа</b></h4>
		</div>
		<!-- <div class="col-6 text-right mt-1 ">Шаг 1</div> -->
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
			<!-- <button type="button" @click="submitFile()" class="btn btn-cyan rounded" name="button">Загрузить</button> -->
		</div>
	</div>
	<!-- <div class="row">
		<div class="div">
			<div class="md-form form-group mt-5">
				<input type="text" class="form-control" id="formGroupExampleInputMD" placeholder="Фрезеровщик">
				<label for="formGroupExampleInputMD">Проффесия</label>
			</div>
		</div>
	</div> -->
	<div class="row mt-4">
		<div class="col-6">
			<h4><b>Документы</b></h4>
			<div v-for="file in files" :key="file.id">
				<i class="far mr-2 fa-trash-alt text-danger" @click="deletes(file.id)"></i>
				<a :href="'/storage/'+file.path">
					{{file.name}}
				</a>
			 </div>
		</div>
		<div class="col-6">
			<h4><b>Нормативно правовые акты</b></h4>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="defaultUnchecke">
				<label class="custom-control-label" for="defaultUnchecke">Трудовой кодекс Российской Федерации</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
				<label class="custom-control-label" for="defaultUnchecked">Федеральный закон Российской Федерации от 17 июля 1999 г. № 181-ФЗ "Об основах охраны труда в Российской Федерации"
				</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="defaultUnchecke">
				<label class="custom-control-label" for="defaultUnchecke">СанПиН</label>
			</div>
			<div class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input" id="defaultUnched">
				<label class="custom-control-label" for="defaultUnched">СНиП </label>
			</div>

		</div>
	</div>
	<div class="row mt-5">
		<div class="col text-center">
			<button type="button" class="btn btn-cyan">Сформировать</button>
		</div>
	</div>
</div>
</template>

<script>
export default {
	mounted() {
		// console.log('Component mounted.')
		this.getfiles();
	},
	data() {
		return {
			file: '',
			files: [],
		}
	},
	methods: {
		submitFile() {
			let formData = new FormData();
			formData.append('file', this.file);
			formData.append('name', this.file.name);
			axios.post('/fileuploads',
					formData, {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}
				).then(res => {
					this.getfiles();
					this.$refs.file.value = '';
				})
				.catch(function() {
				});
		},
		getfiles() {
			axios.post("/getfiles", {}).then(res => {
				this.files = res.data;
			});
		},
		deletes(id) {
			axios.post("/delete", {
				'id': id
			}).then(res => {
				this.getfiles();
			});
		},
		handleFileUpload() {
			this.file = this.$refs.file.files[0];
			this.submitFile()
		}
	}
}
</script>
