<?php

namespace Marktic\Cms\PageBlocks\Types\Presenters\Frontend;

use Nip\View\View;

/**
 *
 */
class ViewFrontendPresenter extends AbstractFrontendPresenter
{
    protected ?View $view = null;

    protected ?string $template = null;

    protected array $params = [];

    public function render(): string
    {
        return $this->getView()->load($this->getTemplate(), $this->params);
    }

    public function withView(View $view): self
    {
        $this->view = $view;
        return $this;
    }


    public function getView(): View
    {
        if ($this->view === null) {
            $this->view = $this->createView();
        }
        return $this->view;
    }
    public function withTemplate(string $template): self
    {
        $this->template = $template;
        return $this;
    }

    public function getTemplate(): string
    {
        if (empty($this->template)) {
            throw new \Exception("Please call withTemplate to set a template to use presenter [" . __CLASS__ . "].");
        }
        return $this->template;
    }
    protected function createView()
    {
        throw new \Exception("Please call withView to set a view instance to use presenter [" . __CLASS__ . "].");
    }
}