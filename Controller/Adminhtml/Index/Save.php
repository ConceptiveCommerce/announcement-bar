<?php

namespace Conceptive\Announcementbar\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Conceptive\Announcementbar\Model\Blog;

class Save extends \Magento\Backend\App\Action
{

    /**
     * @var Blog
     */
    protected $barmodel;

    /**
     * @var Session
     */
    protected $adminsession;

    /**
     * @param Action\Context $context
     * @param Blog           $barmodel
     * @param Session        $adminsession
     */
    public function __construct(
        Action\Context $context,
        Blog $barmodel,
        Session $adminsession
    ) {
        parent::__construct($context);
        $this->barmodel = $barmodel;
        $this->adminsession = $adminsession;
    }

    /**
     * Save blog record action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $bar_id = $this->getRequest()->getParam('bar_id');
            if ($bar_id) {
                $this->barmodel->load($bar_id);
            }

            $this->barmodel->setData($data);

            try {
                $this->barmodel->save();
                $this->messageManager->addSuccess(__('The data has been saved.'));
                $this->adminsession->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    if ($this->getRequest()->getParam('back') == 'add') {
                        return $resultRedirect->setPath('*/*/add');
                    } else {
                        return $resultRedirect->setPath('*/*/edit', ['bar_id' => $this->barmodel->getBlogId(), '_current' => true]);
                    }
                }

                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['bar_id' => $this->getRequest()->getParam('bar_id')]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}