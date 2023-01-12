<?php

namespace Conceptive\Announcementbar\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class Delete extends Action
{

    /**
     * @var \Conceptive\Announcementbar\Model\Blog
     */
    protected $modelBlog;

    /**
     * @param Context                  $context
     * @param \Conceptive\Announcementbar\Model\Blog $blogFactory
     */
    public function __construct(
        Context $context,
        \Conceptive\Announcementbar\Model\Blog $blogFactory
    ) {
        parent::__construct($context);
        $this->modelBlog = $blogFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Conceptive_Announcementbar::index_delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('bar_id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->modelBlog;
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Record deleted successfully.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('Record does not exist.'));
        return $resultRedirect->setPath('*/*/');
    }
}