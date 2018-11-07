function copy()
{
	var copyText = document.getElementById("passwd");
	copyText.select();
	document.execCommand("Copy");
	copyToast();
}

function copyToast()
{
	var x = document.getElementById("snackbar")
	x.className = "show";
	setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}