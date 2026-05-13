<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentWidget extends Component
{
    public string $name    = '';
    public string $body    = '';
    public bool   $submitted = false;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string', 'max:2000'],
        ];
    }

    protected array $messages = [
        'name.required' => 'يرجى كتابة اسمك.',
        'name.max'      => 'الاسم يجب ألا يتجاوز 100 حرف.',
        'body.required' => 'يرجى كتابة تعليقك.',
        'body.max'      => 'التعليق يجب ألا يتجاوز 2000 حرف.',
    ];

    public function submit(): void
    {
        $this->validate();

        Comment::create([
            'name'        => trim($this->name),
            'body'        => trim($this->body),
            'is_approved' => true,
        ]);

        $this->submitted = true;
    }

    public function render()
    {
        $comments = Comment::approved()->latest()->get();

        return view('livewire.comment-widget', compact('comments'));
    }
}
