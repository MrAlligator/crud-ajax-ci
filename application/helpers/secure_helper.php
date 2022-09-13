<?php

function isLoggedIn()
{
    $CIInstance = &get_instance();

    if (!$CIInstance->session->userdata('username')) {
        redirect('auth/forbidden');
    }
}

function isAdmin()
{
    $CIInstance = &get_instance();

    $role = $CIInstance->session->userdata('level');

    if ($role != 'Admin') {
        redirect('auth/forbidden');
    }
}
