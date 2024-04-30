<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class SuperadminLoggedInFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
         if (!session()->get('id')) {
            return redirect()->to(base_url('superadmin/'));
          }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}