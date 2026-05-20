<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Flow View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { background-color: #f8f9fa; padding: 20px; }
        .card { border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: none; }
        .table-responsive { border-radius: 10px; overflow: hidden; }
        .search-box { max-width: 300px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row mb-4 mt-4">
            <div class="col-md-12">
                <h2 class="text-primary text-center">Data Flow Management</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Records</h5>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <input type="text" id="search_name" class="form-control search-input" placeholder="Search by Name">
                        </div>
                        <div class="col-md-4">
                            <select id="search_city" class="form-select search-input">
                                <option value="">Select City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="search_email" class="form-control search-input" placeholder="Search by Email">
                        </div>
                    </div>
                    
                    <div id="table-data">
                        @include('data_table')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            // Handle Pagination Link Click
            $(document).on('click', '.pagination a', function(event){
                event.preventDefault(); 
                var url = new URL($(this).attr('href'), window.location.origin);
                var page = url.searchParams.get('page');
                fetchData(page);
            });

            // Handle Search Event
            $(document).on('keyup change', '.search-input', function(){
                fetchData(1);
            });

            // Fetch Data Function
            function fetchData(page){
                var name = $('#search_name').val();
                var city = $('#search_city').val();
                var email = $('#search_email').val();

                $.ajax({
                    url: "/data",
                    data: {
                        page: page,
                        name: name,
                        city: city,
                        email: email
                    },
                    success: function(data){
                        $('#table-data').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching data:", error);
                    }
                });
            }
        });
    </script>
</body>
</html>
