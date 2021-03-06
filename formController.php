<?php
session_start();

controlsForm();

function controlsForm()
{
    $error = [];
    $data = [];
    foreach ($_POST as $key => $value) {
        $data[$key] = htmlspecialchars($value);
    }


    if (!empty($data['name'])) {
        if (!empty($data['firstname'])) {
            if (filter_var($data['email'],FILTER_VALIDATE_EMAIL)) {
                if (preg_match('#^0[6-7]\d{8}$#', $data['phone'])) {
                    if (!empty($data['subject']) && $data['subject'] != 'emptySelect') {
                        if (!empty($data['message'])) {
                            createMessage($data);
                        } else {
                            $_SESSION['error'] = 'message';
                            $_SESSION['data'] = $data;
                            header('Location: index.php');
                        }
                    } else {
                        $_SESSION['error'] = 'subject';
                        $_SESSION['data'] = $data;
                        header('Location: index.php');
                    }
                } else {
                    $_SESSION['error'] = 'phone';
                    $_SESSION['data'] = $data;
                    header('Location: index.php');
                }
            } else {
                $_SESSION['error'] = 'email';
                $_SESSION['data'] = $data;
                header('Location: index.php');
            }
        } else {
            $_SESSION['error'] = 'firstname';
            $_SESSION['data'] = $data;
            header('Location: index.php');
        }
    } else {
        $_SESSION['error'] = 'name';
        $_SESSION['data'] = $data;
        header('Location: index.php');
    }
}

function createMessage($data) :void
{
    $select = [
            'Demande de rendez-vous',
            'Faire une réclamation',
            'Demande de crédit',
            'Demande d\'information'
        ];
    $data['subject'] = $select[$data['subject']];
    $_SESSION['data'] = $data;
    header('Location: thanks.php');
}
