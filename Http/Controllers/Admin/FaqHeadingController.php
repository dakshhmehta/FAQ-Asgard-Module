<?php

namespace Modules\Faq\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Faq\Entities\FaqHeading;
use Modules\Faq\Http\Form\FaqHeadingForm;
use Modules\Faq\Http\Requests\CreateFaqHeadingRequest;
use Modules\Faq\Http\Requests\UpdateFaqHeadingRequest;
use Modules\Faq\Repositories\FaqHeadingRepository;
use Modules\Faq\Table\FaqHeadingTable;
use Modules\Rarv\Form\FormBuilder;
use Modules\Rarv\Table\TableBuilder;

class FaqHeadingController extends AdminBaseController
{
    /**
     * @var FaqHeadingRepository
     */
    private $faqheading;

    public function __construct(FaqHeadingRepository $faqheading)
    {
        parent::__construct();

        $this->faqheading = $faqheading;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TableBuilder $builder)
    {
        return $builder->setTable(new FaqHeadingTable('faq.faqheading'))->view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(FormBuilder $builder)
    {
        return $builder->setForm(new FaqHeadingForm('faq.faqheading'))->view();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFaqHeadingRequest $request
     * @return Response
     */
    public function store(FormBuilder $builder)
    {
        return $builder->setForm(new FaqHeadingForm('faq.faqheading'))->handle();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  FaqHeading $faqheading
     * @return Response
     */
    public function edit(FaqHeading $faqheading, FormBuilder $builder)
    {
        return $builder->setMode('edit')->setForm(new FaqHeadingForm('faq.faqheading', $faqheading))->view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FaqHeading $faqheading
     * @param  UpdateFaqHeadingRequest $request
     * @return Response
     */
    public function update(FaqHeading $faqheading, FormBuilder $builder)
    {
        return $builder->setMode('edit')->setForm(new FaqHeadingForm('faq.faqheading', $faqheading))->handle();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  FaqHeading $faqheading
     * @return Response
     */
    public function destroy(FaqHeading $faqheading)
    {
        $this->faqheading->destroy($faqheading);

        return redirect()->route('admin.faq.faqheading.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('faq::faqheadings.title.faqheadings')]));
    }
}
