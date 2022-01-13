
<script type="text/javascript">
	Swal.fire({
		icon: 'error',
		title: 'Oops... ',
		text: 'Isi input form yang di wajibkan'
	})
	setTimeout(()=>{
		window.location.href="<?=$_SESSION['url']?>"
	},1000)
</script>