<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabalhoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'priority' => 'required|in:baixa,media,alta',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Campo Nome é obrigatório.",
            'name.min' => "O nome precisa ter no mínimo :min caracteres.",
            'description.required' => "A descrição é obrigatória.",
            'description.min' => "A descrição precisa ter no mínimo :min caracteres.",
            'priority.required' => "Selecione uma prioridade.",
            'due_date.required' => "Defina uma data de entrega.",
            'due_date.date' => "Formato de data inválido.",
            'category_id.required' => "Selecione uma categoria.",
            'category_id.exists' => "Categoria inválida."
        ];
    }
}

