<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
</head>

<body style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh;">
    <h1>Job Application Form</h1>
    <form action="/application" method="POST" enctype="multipart/form-data" style="max-width: 400px; padding: 20px; border: 1px solid #ccc; border-radius: 8px; text-align: center;">
        @csrf

        <!-- Cover Letter Field (Text Area) -->
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <label for="cover_letter" style="min-width: 100px; text-align: right; margin-right: 10px;">Cover Letter:</label>
            <textarea id="cover_letter" name="cover_letter" rows="2" style="width: 100%; max-height: 100px; padding: 10px; box-sizing: border-box;"></textarea>
        </div>


        <!-- Dropdown for Position -->
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <label for="position_id" style="min-width: 100px; text-align: right; margin-right: 10px;">Position:</label>
            <select id="position_id" name="position_id" style="width: 100%; padding: 10px; box-sizing: border-box;">
                @php
                $positions = \App\Models\Position::all();
                @endphp

                @foreach ($positions as $position)
                <option value="{{$position -> id}}">{{$position -> name}}</option>
                <!-- Add more options as needed -->
                @endforeach
            </select>
        </div>

        <!-- CV Field (Text Area) -->
        <div style="display: flex; align-items: center; margin-bottom: 10px;">
            <label for="Cv" style="min-width: 100px; text-align: right; margin-right: 10px;">CV:</label>
            <input type="file" id="Cv" name="Cv" style="width: 100%; padding: 10px; box-sizing: border-box;">
        </div>


        <!-- Submit Button -->
        <input type="submit" value="Submit Application">
    </form>

    <div style="position: absolute; top: 0; right: 0; background-color: #f4f4f4; padding: 10px; border: 1px solid #ccc;">
        The Available Positions: <br><br>
        @foreach($positions as $position)
        Name: {{$position -> name}}<br>
        Title: {{$position->title}}<br>
        Description: {{$position->description}}<br><br>
        @endforeach
    </div>
</body>

</html>