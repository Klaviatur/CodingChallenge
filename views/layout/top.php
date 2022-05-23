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
            width: 80%;
            margin: 0 auto 25px auto;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            min-height: 50px;
        }
        nav > a {
            padding: 15px;
            font-weight: bold;
            text-transform: uppercase;
            background-color: greenyellow;
            color: #333;
            text-decoration: none;
        }
        nav > a:hover {
            text-decoration: underline;
        }
        main {
            width: 80%;
            margin: 0 auto;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        main a {
            text-decoration: none;
            color: #598318;
            padding: 3px 5px;
        }
        main a:hover {
            text-decoration: underline;
        }
        table tr:nth-child(2n) {
            background-color: rgba(173, 255, 47, 0.3);
        }
        .mt-1 {
            margin-top: .5rem;
        }
        .full-width {
            width: 100%;
        }
        .bg-white {
            background-color: white!important;
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
