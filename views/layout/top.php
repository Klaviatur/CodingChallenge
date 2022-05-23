<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <title>Coding Challenge: Address Book</title>

    <style>
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: monospace;
        }
        h1 {
            text-align: center;
        }
        nav {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            min-height: 50px;
        }
        nav > a {
            padding: 15px;
            background-color: greenyellow;
            color: #333;
            text-decoration: none;
        }
        nav > a:hover {
            text-decoration: underline;
        }

        main {
            width: 100%;
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>

    <h1>My Address Book</h1>

    <nav>
        <a href="?action=index">All contacts</a>
        <a href="?action=create">Create contact</a>
    </nav>

    <main>
