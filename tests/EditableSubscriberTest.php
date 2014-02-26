<?php  namespace Jacopo\Authentication\Tests;

/**
 * Test EditableSubscriberTest
 *
 * @author jacopo beschi jacopo@jacopobeschi.com
 */
use Jacopo\Authentication\Events\EditableSubscriber;

class EditableSubscriberTest extends TestCase {

    /**
     * @test
     **/
    public function it_check_if_is_editable()
    {
        $model = new \StdClass;
        $model->editable = true;

        $sub = new EditableSubscriber();
    }

    /**
     * @test
     * @expectedException \Jacopo\Authentication\Exceptions\PermissionException
     **/
    public function it_check_if_es_editable_and_throw_new_exception()
    {
        $model = new \StdClass;
        $model->editable = false;

        $sub = new EditableSubscriber();
        $sub->isEditable($model);
    }
}
 