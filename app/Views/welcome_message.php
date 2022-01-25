<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>CKEditor 5 – Document editor</title>
	<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/decoupled-document/ckeditor.js"></script>
	<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>

	<div class="container">
		<h1 class="title">CKEditor 5 - Document editor</h1>
		<!-- The toolbar will be rendered in this container. -->
		<div id="toolbar-container" class="toolbar-container"></div>

		<!-- This container will become the editable. -->
		<div class="editor-container">
			<div id="editor">
			</div>
		</div>
	</div>

	<script>
		DecoupledEditor
			.create(document.querySelector('#editor'), {
				fontSize: {
					options: [
						9,
						11,
						12,
						13,
						'default',
						17,
						18,
						19,
						21,
						24
					],
					supportAllValues: true
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