<?php

namespace spec\Angelov\ResultLists\Pagination\CurrentPageResolvers;

use Angelov\ResultLists\Pagination\CurrentPageResolvers\CurrentPageResolverInterface;
use Angelov\ResultLists\Pagination\CurrentPageResolvers\RequestCurrentPageResolver;
use Angelov\ResultLists\Pagination\CurrentRequestResolvers\CurrentRequestResolverInterface;
use PhpSpec\ObjectBehavior;
use Psr\Http\Message\ServerRequestInterface;

class RequestCurrentPageResolverSpec extends ObjectBehavior
{
    function let(CurrentRequestResolverInterface $requestResolver, ServerRequestInterface $request)
    {
        $requestResolver->getCurrentRequest()->willReturn($request);

        $this->beConstructedWith($requestResolver);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RequestCurrentPageResolver::class);
    }

    function it_is_current_page_resolver()
    {
        $this->shouldImplement(CurrentPageResolverInterface::class);
    }

    function it_returns_first_page_as_default_value()
    {
        $this->resolve()->shouldReturn(1);
    }

    function it_returns_first_page_when_page_attribute_is_not_a_number(CurrentRequestResolverInterface $requestResolver, ServerRequestInterface $request)
    {
        $request->getQueryParams()->shouldBeCalled()->willReturn(['page' => 'second']);

        $requestResolver->getCurrentRequest()->shouldBeCalled()->willReturn($request);

        $this->resolve()->shouldReturn(1);
    }

    function it_reads_the_page_from_request_query_attributes(CurrentRequestResolverInterface $requestResolver, ServerRequestInterface $request)
    {
        $request->getQueryParams()->shouldBeCalled()->willReturn(['page' => '3']);

        $requestResolver->getCurrentRequest()->shouldBeCalled()->willReturn($request);

        $this->resolve()->shouldReturn(3);
    }

    function it_resolves_the_page_with_different_page_query_attributes(CurrentRequestResolverInterface $requestResolver, ServerRequestInterface $request)
    {
        $request->getQueryParams()->shouldBeCalled()->willReturn(['pageNumber' => '4']);

        $requestResolver->getCurrentRequest()->shouldBeCalled()->willReturn($request);

        $this->resolve('pageNumber')->shouldReturn(4);
    }
}
