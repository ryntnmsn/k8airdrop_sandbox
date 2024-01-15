<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content=" {{ csrf_token() }}">

    <title>K8 Airdrop | Admin</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://kit.fontawesome.com/6011d22640.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{url('assets/css/admin-style.css')}}" />
    
    <script src="https://cdn.tiny.cloud/1/ftneg51muvx4ac1pfxibtij352lhkqvr24snffh2kmobpcuc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init
		({
  			selector: "textarea",  // change this value according to your html
  			plugins: "textcolor link table media",
  			toolbar: "forecolor backcolor link table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
  			default_link_target: "_blank",

            // forced_root_block : 'p',
            // forced_root_block_attrs: { "class": "no-margin"},
		});
	</script>

</head>
<body>
<x-messages />
<x-error />
