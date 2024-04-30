<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class VendorLoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
         if (!session()->get('venid')) {
            return redirect()->to(base_url('vendor-login'));
          }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}