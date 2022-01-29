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

		<!-- The toolbar will be rendered in this container. -->
		<div id="toolbar-container" class="toolbar-container"></div>

		<!-- This container will become the editable. -->
		<div class="editor-container">
			<div id="editor">

			</div>
		</div>
	</div>

	<script src="<?= base_url('/ckfinder/ckfinder.js') ?>"></script>
	<script>
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
						'ckfinder', '|',
						'heading', '|',
						'alignment', '|',
						'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
						'link', '|',
						'bulletedList', 'numberedList', 'todoList',
						'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
						'code', 'codeBlock', '|',
						'insertTable', '|',
						'outdent', 'indent', '|',
						'uploadImage', 'blockQuote', '|',
						'undo', 'redo'
					],
					shouldNotGroupWhenFull: true
				}

			})
			.then(editor => {
				const toolbarContainer = document.querySelector('#toolbar-container');

				toolbarContainer.appendChild(editor.ui.view.toolbar.element);
			})
			.catch(error => {
				console.error(error);
			});
	</script>
</body>

</html>