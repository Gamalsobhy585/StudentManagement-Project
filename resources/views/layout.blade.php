<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-nPr3/vP+S1FqLTsoM4w/NmFJh/Hew+tb6+0f92wS6b4eFf6Y38ZwzNQQTA+ilFM4L1k7bOIXM+0U5xYAC4ozmw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">


<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<link rel="icon" type="image/png" href="/images/favicon.png">

<title>@yield('title', 'Student Management')</title>
    <style>
        /* Sidebar navigation menu */
    
    </style>
</head>

<body>
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="me-4 mt-4 d-flex justify-content-end ">
        <button class="btn btn-success sidebar-toggle">Menu</button>

    </div>

        <div class="row">
            <div class="col-md-3">
                <div class="sidebar ">
                    <a class="active" href="/home">Home</a>
                    <a href="{{url('/students')}}">Student</a>
                    <a href="{{url('/teachers')}}">Teacher</a>
                    <a href="{{url('/courses')}}">Courses</a>
                    <a href="{{url('/batches')}}">Batches</a>
                    <a href="{{url('/enrollments')}}">Enrollment</a>
                    <a href="{{url('/payments')}}">Payment</a>
                    <form class="logout-form position-relative  px-2 " action="{{url('logout')}}" method="POST">
                        @csrf
                        <input class="btn btn-danger" type="submit" value="logout">
                    </form>
                </div>
            </div>
            <div style="width: 100%;" class="col-md-9 box">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(event) {
        event.preventDefault(); // Prevent the default form submission
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.closest('form').submit(); // Submit the form if confirmed
            }
        });
    }
    document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            if (sidebar.style.display === 'block') {
                sidebar.style.display = 'none';
            } else {
                sidebar.style.display = 'block';
            }
        });
        const links = document.querySelectorAll('.sidebar a');
        links.forEach(link => {
            link.addEventListener('click', function() {
                links.forEach(lnk => lnk.classList.remove('bg-success'));
                this.classList.add('bg-success');
            });
        });
</script>

</body>

</html>
