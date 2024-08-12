<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lilac Infotech Assessment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <div id="container">
        <label><b>Search</b></label>
        <div id="search-div">
            <input type="text" id="search-field" placeholder="Search name / designation / department">
        </div>

        <div id="user-div">
            @foreach ($results as $result)
            <div class="usersetails-section">
                <p><b>{{ $result->name }}</b></p>
                <p>{{ $result->department->name }}</p>
                <p>{{ $result->designation->name }}</p>
                <p>{{ $result->phonenumber }}</p>
            </div>
            @endforeach
        </div>
    </div>
    <script>
    $('#search-field').on('input', function() {
        var searchedText = $(this).val();
        if (searchedText.length === 0 || searchedText.length > 0) {
            $.ajax({
                url: "{{ route('users.searchData') }}",
                type: 'GET',
                data: {
                    searchedText: searchedText
                },
                success: function(response) {
                    $('#user-div').empty();
                    response.usersDetails.forEach(function(user) {
                        var searchedResult = `
                        <div class="usersetails-section">
                            <p><b>${user.name}</b></p>
                            <p>${user.department.name}</p>
                            <p>${user.designation.name}</p>
                        </div>`;
                        $('#user-div').append(searchedResult);
                    });
                }
            });
        } else {
            $('#user-div').empty();
        }
    });
    </script>
</body>

</html>