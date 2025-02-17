<!DOCTYPE html>
<html>
<head>
    <title>New Form Submission</title>
</head>
<body>
    <h2>New Form Submission Received</h2>

    <table>
        <tr>
            <td><strong>First Name:</strong></td>
            <td>{{ $data['first'] }}</td>
        </tr>
        <tr>
            <td><strong>Last Name:</strong></td>
            <td>{{ $data['last'] }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <td><strong>Company Name:</strong></td>
            <td>{{ $data['company'] }}</td>
        </tr>
        <tr>
            <td><strong>Job Title:</strong></td>
            <td>{{ $data['job-title'] }}</td>
        </tr>
        <tr>
            <td><strong>Job Function:</strong></td>
            <td>{{ $data['job-function'] }}</td>
        </tr>
        <tr>
            <td><strong>Phone:</strong></td>
            <td>{{ $data['phone'] }}</td>
        </tr>
        <tr>
            <td><strong>Country:</strong></td>
            <td>{{ $data['country'] }}</td>
        </tr>
    </table>
</body>
</html>