<x-progress-step :section="$section" :title="$title" :description="$description" current_step_name="{{ $currentStepName }}">
    <form method="POST">
        @csrf

        <div class="mb-3">
            <h1 class="fs-3 fw-bold mb-3">Uitleg {{ $content->section_name }}</h1>
            <?= $content->info ?>
        </div>

        <x-navigation-buttons :previous="$previous" :next="$next" next-label="Volgende"/>
    </form>
</x-progress-step>
