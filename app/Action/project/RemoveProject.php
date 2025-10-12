<?php

namespace App\Action\project;

use App\Models\Project;

class RemoveProject
{
    public function __invoke($requestData): array
    {
        $project_id = $requestData['id'];

        $project = $this->isProjectIdExist($project_id);

        if (!$project) {
            return [
                'message' => 'Project not found',
            ];
        }

        $project->delete();
        return [
            'message' => 'Project removed successfully',
        ];
    }

    private function isProjectIdExist($project_id)
    {
        return Project::where('id', $project_id)->first();
    }
}
