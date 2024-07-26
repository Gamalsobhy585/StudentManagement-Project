@extends('layout')
@section('title', 'Home')
@section('content')
<body style="background-color: #f7f7f7;">
    @if (session('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    <h1 class="dancing-script text-center animated floating">ByteTech Academy</h1>


    <div class="container d-flex align-items-center justify-content-between ">
      
           
       
        <div class="image-container me-5  mb-3">
            <img src="{{ asset('images/classroom.jpg') }}" class="rounded" alt="Online School">
            <div class="overlay">
                <div class="overlay-text">Education is the passport to the future, for tomorrow belongs to those who prepare for it today.</div>
            </div>
        </div>
            <div class="cards">
                <div class="card red">
                    <p class="tip">+3200</p>
                    <p class="second-text">Students </p>
                </div>
                <div class="card blue">
                    <p class="tip">+120 </p>
                    <p class="second-text">Instructors</p>
                </div>
                <div class="card green">
                    <p class="tip">+300</p>
                    <p class="second-text">Courses Completed</p>
                </div>
                <div class="card Orange">
                    <p class="tip">+2000</p>
                    <p class="second-text">Postive Reviews</p>
                </div>
                <div class="card purple">
                    <p class="tip">+1500</p>
                    <p class="second-text">Certified graduate</p>
                </div>
            </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(event) {
            event.preventDefault();
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
                    event.target.closest('form').submit(); 
                }
            });
        }
    </script>
</body>
@endsection
