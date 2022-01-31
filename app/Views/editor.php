<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>CKEditor 5 – Document editor</title>
	<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/decoupled-document/ckeditor.js"></script>
	<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
	<div class="container">
		<h1 class="title">Document editor</h1>
		<input type="text" class="judul" id="judul" placeholder="Input Judul Konten...">
		<!-- The toolbar will be rendered in this container. -->
		<div id="toolbar-container" class="toolbar-container"></div>

		<!-- This container will become the editable. -->
		<div class="editor-container">
			<div id="editor">

			</div>
		</div>

		<!-- button -->		
		<button class="button" id="button-save">Save</button>
	</div>

	<script src="<?= base_url('/ckfinder/ckfinder.js') ?>"></script>
	<script src="<?= base_url('/js/insert-data.js') ?>"></script>
	<script>
		let konten
		DecoupledEditor
			.create(document.querySelector('#editor'), {
				fontSize: {
					options: [
						9,
						10,
						11,
						12,
						13,
						'default',
						16,
						17,
						19,
						21,
						24
					]
				},
				ckfinder: {
					// Upload the images to the server using the CKFinder QuickUpload command.
					uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json'
				},
				toolbar: {
					items: [
						'ckfinder', 'uploadImage', '|',
						'heading', '|',
						'alignment', '|',
						'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
						'link', '|',
						'bulletedList', 'numberedList', 'todoList',
						'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
						'code', 'codeBlock', '|',
						'insertTable', '|',
						'outdent', 'indent', '|',
						, 'blockQuote', '|',
						'undo', 'redo'
					],
					shouldNotGroupWhenFull: true
				}

			})
			.then(editor => {
				konten = editor;
				const toolbarContainer = document.querySelector('#toolbar-container');

				toolbarContainer.appendChild(editor.ui.view.toolbar.element);
			})
			.catch(error => {
				console.error(error);
			});

		// send data to server
		const buttonSave = document.getElementById('button-save')
		buttonSave.addEventListener('click', () => {
			const judul = document.getElementById('judul')

			const data = {
				'judul': judul.value,
				'konten': konten.getData()
			}

			insert(data);
		})

	</script>
</body>

</html>