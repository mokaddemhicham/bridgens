<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Membres</title>
    <style>
        table{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 13px;
        }

        table td, table th{
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even){
            background-color: #f2f2f2;
        }

        table th{
            padding: 12px 8px;
            text-align: left;
            color: #212529; 
        }
        p{
            font-family: Arial, Helvetica, sans-serif;
            color: red;
        }

    </style>
</head>
<body>

    <center><img src="https://files.fm/thumb_show.php?i=vsbntuse6" alt="logo" width="150"></center>
    <p>liste triée par ordre alphabétique des membres du club Bridge'ENS</p>
    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Filière</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($membres as $membre)
                    <tr>
                        <td>{{ $membre->nom }}</td>
                        <td>{{ $membre->prenom }}</td>
                        <td>{{ $membre->email }}</td>
                        <td>{{ $membre->phone }}</td>
                        <td>{{ $membre->filiere }}</td>
                        <td>{{ $membre->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>