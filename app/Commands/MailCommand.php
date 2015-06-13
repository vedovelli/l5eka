<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class MailCommand extends Command implements SelfHandling {

	protected $project;
	protected $action;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($project, $action)
	{
		$this->project = $project;
		$this->action = $action;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$project = $this->project;
		switch($this->action)
		{
			case 'UserAddedToProject':
				foreach ($this->project->members as $member) {
					\Mail::send('project.emails.user-added-to-project', ['member' => $member], function($message) use ($project, $member)
					{
					    $message->to($member->email, $member->name)->subject('Vc foi adicionado ao projeto '.$project->name. '!');
					});
				}
				break;
		}
	}

}
