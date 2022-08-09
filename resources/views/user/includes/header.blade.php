<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">


  <!-- HTML Meta Tags -->
  <title>R. Prama Wijaya Law Firm</title>
  <meta name="description" content="{{$tp->tentang_perusahaan}}">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://rpw-temp.herokuapp.com/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="R. Prama Wijaya Law Firm">
  <meta property="og:description" content="{{$tp->tentang_perusahaan}}">
  <meta property="og:image" content="{{asset('img/'.$tp->logo_perusahaan)}}">
  <meta property="og:image:width" content="600">
  <meta property="og:image:height" content="314">
  

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="rpw-temp.herokuapp.com">
  <meta property="twitter:url" content="https://rpw-temp.herokuapp.com/">
  <meta name="twitter:title" content="R. Prama Wijaya Law Firm">
  <meta name="twitter:description" content="{{asset('img/'.$tp->tentang_perusahaan)}}">
  <meta name="twitter:image" content="{{asset('img/'.$tp->logo_perusahaan)}}">

  <!-- Meta Tags Generated via https://www.opengraph.xyz -->
        

<!-- Favicon -->
<link href="{{asset('img/'.$tp->logo_perusahaan)}}" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{asset('user/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{asset('user/scss/style.css')}}" rel="stylesheet">
