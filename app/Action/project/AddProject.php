<?php

namespace App\Action\project;

use App\Models\Project;

class AddProject
{
    public function __invoke($requestData): array
    {
        return $this->insertDataToDatabase($requestData);
    }

    private function insertDataToDatabase($requestData): array
    {
        $project = Project::create([
            'title' => $requestData['title'],
            'description' => $requestData['description'],
            'image_link' => $requestData['image_link'],
            ]);

        return [
            'message' => 'Project added successfully',
            'project_id' => $project->id,
        ];
    }
}
