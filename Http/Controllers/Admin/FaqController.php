<?php

namespace Modules\Faq\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Faq\Entities\Faq;
use Modules\Faq\Http\Form\FaqForm;
use Modules\Faq\Repositories\FaqRepository;
use Modules\Faq\Table\FaqTable;
use Modules\Rarv\Form\FormBuilder;
use Modules\Rarv\Table\TableBuilder;

class FaqController extends AdminBaseController
{
    /**
     * @var FaqRepository
     */
    private $faq;
    private $form;

    public function __construct(FaqRepository $faq)
    {
        parent::__construct();

        $this->faq = $faq;
        $this->form = new FaqForm('faq.faq');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TableBuilder $builder)
    {
        return $builder->setTable(new FaqTable('faq.faq'))->view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(FormBuilder $builder)
    {
        return $builder->setForm($this->form)->view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFaqRequest $request
     * @return Response
     */
    public function store(FormBuilder $builder)
    {
        return $builder->setForm($this->form)->handle();

        return redirect()->route('admin.faq.faq.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('faq::faqs.title.faqs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Faq $faq
     * @return Response
     */
    public function edit(Faq $faq, FormBuilder $builder)
    {
        $this->form->setModel($faq);
        return $builder->setMode('edit')->setForm($this->form)->view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Faq $faq
     * @param  UpdateFaqRequest $request
     * @return Response
     */
    public function update(Faq $faq, FormBuilder $builder)
    {
        $this->form->setModel($faq);
        return $builder->setMode('edit')->setForm($this->form)->handle();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Faq $faq
     * @return Response
     */
    public function destroy(Faq $faq)
    {
        $this->faq->destroy($faq);

        return redirect()->route('admin.faq.faq.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('faq::faq.title.faqs')]));
    }
}
