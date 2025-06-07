<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Registrar un nuevo usuario
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        try {
            // Validar los datos de entrada
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|min:2|max:255',
                'apellido1' => 'required|string|min:2|max:255',
                'apellido2' => 'nullable|string|min:2|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ], [
                'nombre.required' => 'El nombre es obligatorio',
                'nombre.min' => 'El nombre debe tener al menos 2 caracteres',
                'apellido1.required' => 'El primer apellido es obligatorio',
                'apellido1.min' => 'El primer apellido debe tener al menos 2 caracteres',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe ser válido',
                'email.unique' => 'Este email ya está registrado',
                'password.required' => 'La contraseña es obligatoria',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden',
            ]);

            // Si la validación falla, retornar errores
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en los datos proporcionados',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Crear el nuevo usuario
            $user = User::create([
                'nombre' => $request->nombre,
                'apellido1' => $request->apellido1,
                'apellido2' => $request->apellido2,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user', // Por defecto todos son usuarios
            ]);

            // Crear token de acceso
            $token = $user->createToken('FocusTrack-Token')->plainTextToken;

            // Respuesta exitosa
            return response()->json([
                'success' => true,
                'message' => 'Usuario registrado exitosamente',
                'data' => [
                    'user' => [
                        'id_user' => $user->id_user,
                        'nombre' => $user->nombre,
                        'apellido1' => $user->apellido1,
                        'apellido2' => $user->apellido2,
                        'email' => $user->email,
                        'role' => $user->role,
                        'created_at' => $user->created_at,
                    ],
                    'token' => $token,
                    'token_type' => 'Bearer',
                ]
            ], 201);

        } catch (\Exception $e) {
            // Manejo de errores inesperados
            return response()->json([
                'success' => false,
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cerrar sesión del usuario (logout)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            // Revocar el token actual del usuario autenticado
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Sesión cerrada exitosamente'
            ], 200);

        } catch (\Exception $e) {
            // Manejo de errores inesperados
            return response()->json([
                'success' => false,
                'message' => 'Error al cerrar sesión',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Cerrar todas las sesiones del usuario (logout de todos los dispositivos)
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logoutAll(Request $request): JsonResponse
    {
        try {
            // Revocar todos los tokens del usuario autenticado
            $request->user()->tokens()->delete();

            return response()->json([
                'success' => true,
                'message' => 'Todas las sesiones han sido cerradas exitosamente'
            ], 200);

        } catch (\Exception $e) {
            // Manejo de errores inesperados
            return response()->json([
                'success' => false,
                'message' => 'Error al cerrar todas las sesiones',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
