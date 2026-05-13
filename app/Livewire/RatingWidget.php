<?php

namespace App\Livewire;

use App\Models\Rating;
use Livewire\Component;

class RatingWidget extends Component
{
    // ── Form fields ───────────────────────────────────────────────────────────
    // Use nullable int so 0 (unselected) passes through without type errors
    public ?int $overall = null;
    public ?int $price   = null;
    public ?int $service = null;
    public ?int $staff   = null;
    public ?int $quality = null;
    public string $comment = '';

    // ── UI state ─────────────────────────────────────────────────────────────
    public bool $submitted = false;

    protected function rules(): array
    {
        return [
            'overall' => ['required', 'integer', 'between:1,5'],
            'price'   => ['nullable', 'integer', 'between:1,5'],
            'service' => ['nullable', 'integer', 'between:1,5'],
            'staff'   => ['nullable', 'integer', 'between:1,5'],
            'quality' => ['nullable', 'integer', 'between:1,5'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ];
    }

    protected array $messages = [
        'overall.required' => 'يرجى اختيار التقييم العام.',
        'overall.between'  => 'يرجى اختيار تقييم بين 1 و 5.',
        'comment.max'      => 'التعليق يجب ألا يتجاوز 1000 حرف.',
    ];

    public function setScore(string $field, int $value): void
    {
        if (in_array($field, ['overall', 'price', 'service', 'staff', 'quality'], true)) {
            $this->$field = $value;
            $this->resetErrorBag($field);
        }
    }

    public function submit(): void
    {
        $this->validate();

        Rating::create([
            'overall'     => $this->overall,
            'price'       => $this->price,
            'service'     => $this->service,
            'staff'       => $this->staff,
            'quality'     => $this->quality,
            'comment'     => trim($this->comment) ?: null,
            'is_approved' => true,
        ]);

        $this->submitted = true;
    }

    public function render()
    {
        $stats   = Rating::globalStats();
        $reviews = Rating::approved()->latest()->take(5)->get();

        return view('livewire.rating-widget', compact('stats', 'reviews'));
    }
}
