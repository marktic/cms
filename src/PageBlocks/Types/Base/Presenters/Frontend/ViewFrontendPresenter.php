<?php

namespace Marktic\Cms\PageBlocks\Types\Base\Presenters\Frontend;

use Nip\View\View;
use Nip\View\Template\Template;

/**
 *
 */
class ViewFrontendPresenter extends AbstractFrontendPresenter
{
    protected ?View $view = null;

    protected ?string $template = null;

    protected ?array $params = null;

    public function render(): string
    {
        return $this->getView()->render($this->getTemplate(), $this->getParams());
    }

    public function withView(Template|View $view): self
    {
        if ($view instanceof Template) {
            $view = $view->getEngine();
        }
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
            $this->template = $this->generateTemplate();
        }
        return $this->template;
    }

    protected function createView()
    {
        throw new \Exception("Please call withView to set a view instance to use presenter [" . __CLASS__ . "].");
    }

    protected function generateTemplate()
    {
        throw new \Exception("Please call withTemplate to set a template to use for presenter [" . __CLASS__ . "].");
    }

    protected function getParams(): ?array
    {
        if ($this->params === null) {
            $this->params = $this->generateParams();
        }
        return $this->params;
    }

    protected function generateParams(): array
    {
        return [];
    }
}