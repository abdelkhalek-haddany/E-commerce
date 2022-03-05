<?php
namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PostViewer;
class ViewsCount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostViewer $event)
    {
        $this->updateViews($event->post);
    }

    public function updateViews($post){
    $post->views = $post->views + 1;
    $post->save();
    }
}