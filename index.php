<?php
session_start();
require "bootstrap.php";
require "pages/delete_page.php";
require "pages/add_page.php";
require "pages/edit_page.php";



$pages = $entityManager->getRepository('Pages')->findAll();
$db_headers = $entityManager->getClassMetadata('Pages')->getColumnNames();

deletePage($entityManager);


//---------------GENERATE DYNAMIC MENU LINKS FROM DB---------------

function pageLinks()
{
    global $pages;

    foreach ($pages as $values) {
        $page_name = $values->getName();
        $page_id = $values->getId();
        $page_content = $values->getContent();
        echo
            "<a href=\"index.php?pageId=$page_id&pageName=$page_name&pageContent=$page_content\">$page_name</a><br>";
    }
}


function generatePage()
{
    global $pages;

    if (isset($_GET["pageId"])) {

        $page_name = $_GET["pageName"];
        $page_content = $_GET["pageContent"];

        echo
            '<!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>CMS ' . $page_name . '</title>
            </head>
            <body>
                <a href="login.php?login">Login</a>
                <br>' . pageLinks($pages) . '
                <h1>' . $page_name . '</h1>
                <h3>' . $page_content . '</h3>
            </body>

            </html>';
    } elseif (
        !isset($_POST["login"]) && !isset($_GET["editPage"])
        && !isset($_GET["addPage"]) && !isset($_GET["deletePage"])
        && !isset($_GET["delete"]) && !isset($_GET["add"])
        && !isset($_POST["editPage"]) && !isset($_GET["admin"])
    ) {

        $min_page_id = min($pages)->getId();

        foreach ($pages as $key) {
            if ($key->getId() === $min_page_id) {
                echo
                    '<!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>CMS ' . $key->getName() . '</title>
                </head>

                <body>
                    <a href="login.php">Login</a>
                    ' . pageLinks($pages) . '
                    <h1>' . $key->getName() . '</h1>
                    <h3>' . $key->getContent() . '</h3>
                </body>

                </html>';
            }
        }
    }
}


function generateAdmin($pages)
{
    global $db_headers, $entityManager;
    if (
        isset($_POST["login"]) || isset($_GET["editPage"])
        || isset($_GET["addPage"]) || isset($_GET["deletePage"])
        || isset($_GET["delete"]) || isset($_GET["add"])
        || isset($_POST["editPage"]) || isset($_GET["admin"])
    ) {
        echo
            '<!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>CMS Admin</title>
                </head>
                <body>
                    <a href="index.php">Logout</a>
                    <h1>Welcome to Admin section</h1>
            <table>
                <tr>';
        foreach ($db_headers as $key) {
            echo  "<th>" . $key . "</th>";
        };
        '</tr>';
        foreach ($pages as $values) {

            $page_id = $values->getId();
            $page_name = $values->getName();
            $page_content = $values->getContent();

            echo
                "<tr>
                    <td>" . $values->getId() . "</td>
                    <td>" . $values->getName() . "</td>
                    <td>" . $values->getContent() . "</td>
                    <td>
                    <a href=\"index.php?editPage=$page_id&pageName=$page_name&pageContent=$page_content\">Edit</a>
                    <a href=\"index.php?addPage=$pages\">Add</a>
                    <a href=\"index.php?deletePage=$page_id\">Delete<a>
                    </td>
                </tr>";
        };
        '</table>';
        addNewPage($entityManager);
        editPage($entityManager);

        '</body>

                </html>';
    }
};
generateAdmin($pages);
generatePage();

