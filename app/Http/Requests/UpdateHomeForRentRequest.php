<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomeForRentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Verifica se o usuário autenticado é o dono da casa
        $home = $this->route('id');
        return $this->user()->id === \App\Models\HomeForRent::find($home)->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'description' => 'nullable|string|max:5000',
            'photo' => 'nullable|url|max:500',
            'address' => 'required|string|max:255',
            'condition' => 'nullable|string|max:100',
            'type' => 'required|in:Casa,Apartamento',
            'value' => 'required|numeric|min:0',
            'area' => 'required|integer|min:1',
            'bed' => 'required|integer|min:0',
            'bath' => 'required|integer|min:0',
            'parking' => 'nullable|integer|min:0',
            'cep' => 'required|string|size:8',
            'active' => 'sometimes|boolean',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'description.max' => 'A descrição não pode ter mais de 5000 caracteres.',
            'photo.url' => 'A foto deve ser uma URL válida.',
            'photo.max' => 'A URL da foto não pode ter mais de 500 caracteres.',
            'address.required' => 'O endereço é obrigatório.',
            'address.max' => 'O endereço não pode ter mais de 255 caracteres.',
            'type.required' => 'O tipo do imóvel é obrigatório.',
            'type.in' => 'O tipo deve ser Casa ou Apartamento.',
            'value.required' => 'O valor é obrigatório.',
            'value.numeric' => 'O valor deve ser um número.',
            'value.min' => 'O valor deve ser maior que zero.',
            'area.required' => 'A área é obrigatória.',
            'area.integer' => 'A área deve ser um número inteiro.',
            'area.min' => 'A área deve ser no mínimo 1m².',
            'bed.required' => 'O número de quartos é obrigatório.',
            'bed.integer' => 'O número de quartos deve ser um número inteiro.',
            'bed.min' => 'O número de quartos deve ser no mínimo 0.',
            'bath.required' => 'O número de banheiros é obrigatório.',
            'bath.integer' => 'O número de banheiros deve ser um número inteiro.',
            'bath.min' => 'O número de banheiros deve ser no mínimo 0.',
            'parking.integer' => 'O número de vagas deve ser um número inteiro.',
            'parking.min' => 'O número de vagas deve ser no mínimo 0.',
            'cep.required' => 'O CEP é obrigatório.',
            'cep.size' => 'O CEP deve ter 8 dígitos.',
        ];
    }
}
