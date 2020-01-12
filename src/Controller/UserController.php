<?php

declare(strict_types=1);

namespace App\Controller;

use App\Authenticate\Auth;
use App\Entity\User;
use App\Hash;
use App\Table\UserTable;
use App\Validator\Validator;
use Exception;
use Psr\Http\Message\ServerRequestInterface as Request;
use Zend\Diactoros\Response;

class UserController extends BaseController
{

	/**
	 * @param Request $request
	 * @param Auth $auth
	 * @param Validator $validator
	 * @return Response
	 * @throws Exception
	 */
	public function login(Request $request, Auth $auth, Validator $validator): Response
	{
		if ($request->getMethod() === 'POST') {
			$data = $request->getParsedBody();
			$validator
				->check($data)
				->required('username')
				->required('password');

			if (! $validator->hasErrors() && $auth->login($data['username'], $data['password'])) {
				return $this->withRedirect('root');
			}
		}

		return $this->render('user.login');
	}

	/**
	 * @param Request $request
	 * @param Validator $validator
	 * @param Auth $auth
	 * @param UserTable $userTable
	 * @return Response
	 * @throws Exception
	 */
	public function register(
		Request $request, Validator $validator, Auth $auth, UserTable $userTable, Hash $hash
	): Response {
		if ($request->getMethod() === 'POST') {
			$data = $request->getParsedBody();
			$validator
				->check($data)
				->required('username')
				->required('password')
				->required('password_confirm')
				->required('email')
				->email('email')
				->identical('password', 'password_confirm');

			unset($data['password_confirm']);

			if ($validator->hasErrors()) {
				return $this->withRedirect('user.register');
			}

			$password = $hash->password($data['password']);
			$data['password'] = $password;
			$user = new User();
			$user->username = $data['username'];
			$user->email    = $data['email'];
			$user->id       = $userTable->save($data);
			$auth->setCurrent($user);

			return $this->withRedirect('root');
		}

		return $this->render('user.register');
	}

	/**
	 * @param Auth $auth
	 * @return Response
	 * @throws Exception
	 */
	public function disconnect(Auth $auth): Response
	{
		$user = $auth->current();
		if (! $user) {
			throw new Exception("Not current user.");
		}

		$auth->disconnect();
		return $this->withRedirect('root');
	}

}