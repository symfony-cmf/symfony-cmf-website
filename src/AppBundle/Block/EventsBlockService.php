<?php

namespace AppBundle\Block;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BlockServiceInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\PHPCR\DocumentManager;
use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishWorkflowChecker;

class EventsBlockService extends BaseBlockService implements BlockServiceInterface
{
    protected $template = 'block/block_events.html.twig';
    protected $dm;
    protected $publishWorkflowChecker;

    public function __construct($name, $templating, $template = null, DocumentManager $dm, PublishWorkflowChecker $publishWorkflowChecker)
    {
        if ($template) {
            $this->template = $template;
        }
        parent::__construct($name, $templating);

        $this->dm = $dm;
        $this->publishWorkflowChecker = $publishWorkflowChecker;
    }

    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $form, BlockInterface $block)
    {
        throw new \RuntimeException('Not used at the moment, editing using a frontend or backend UI could be changed here');
    }

    /**
     * {@inheritdoc}
     */
    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        throw new \RuntimeException('Not used at the moment, validation for editing using a frontend or backend UI could be changed here');
    }

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        if (!$response) {
            $response = new Response();
        }

        if ($blockContext->getBlock()->getEnabled()) {
            $qb = $this->dm->createQueryBuilder();

            $qb->from()
                    ->document('AppBundle\Document\TalkBlock', 't')
                ->end()
                // TODO https://github.com/jackalope/jackalope-doctrine-dbal/issues/153
                // generates invalid sql-2 query: (t.publishEndDate > CAST('2013-11-11T10:19:42.000+01:00' AS DATE)
//                ->where()
//                    ->gt()->field('t.publishEndDate')->literal(new \DateTime())
//                ->end()
                ->orderBy()->desc()->field('t.publishEndDate')
            ;

            if ($maxItems = $blockContext->getSetting('maxItems')) {
                $qb->setMaxResults($maxItems);
            }

            // filter by published
            $talkBlocks = array();
            foreach ($qb->getQuery()->execute() as $document) {
                if ($this->publishWorkflowChecker->isGranted(PublishWorkflowChecker::VIEW_ANONYMOUS_ATTRIBUTE, $document)) {
                    $talkBlocks[] = $document;
                }
            }
            $talkBlocks = array_reverse($talkBlocks);

            $response = $this->renderResponse($blockContext->getTemplate(), array(
                'block' => $blockContext->getBlock(),
                'talkBlocks' => $talkBlocks,
            ), $response);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'template' => $this->template,
            'maxItems' => 10,
        ));
    }

    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }
}
