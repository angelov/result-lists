<?php

namespace spec\Angelov\ResultLists\Pagination\UrlGenerators\RoutingPaginationUrlGenerator\UrlPropertiesResolver;

use Angelov\ResultLists\Pagination\CurrentRequestResolvers\CurrentRequestResolverInterface;
use PhpSpec\ObjectBehavior;
use Angelov\ResultLists\Pagination\UrlGenerators\RoutingPaginationUrlGenerator\UrlPropertiesResolver\RequestUrlPropertiesResolver;
use Angelov\ResultLists\Pagination\UrlGenerators\RoutingPaginationUrlGenerator\UrlPropertiesResolver\UrlPropertiesResolverInterface;
use Psr\Http\Message\ServerRequestInterface;

class RequestUrlPropertiesResolverSpec extends ObjectBehavior
{
    function let(CurrentRequestResolverInterface $requestResolver)
    {
        $this->beConstructedWith($requestResolver);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RequestUrlPropertiesResolver::class);
    }

    function it_is_url_properties_resolver()
    {
        $this->shouldImplement(UrlPropertiesResolverInterface::class);
    }

    function it_reads_the_query_attributes_from_request(
        CurrentRequestResolverInterface $requestResolver,
        ServerRequestInterface $request
    ) {
        $requestResolver->getCurrentRequest()->shouldBeCalled()->willReturn($request);

        $request->getQueryParams()->shouldBeCalled()->willReturn([
            'first' => 'value1',
            'second' => 'value2'
        ]);

        $this->resolve()->shouldReturn([
            'first' => 'value1',
            'second' => 'value2'
        ]);
    }

    function it_returns_empty_array_when_there_are_no_query_attributes(
        CurrentRequestResolverInterface $requestResolver,
        ServerRequestInterface $request
    ) {
        $request->getQueryParams()->shouldBeCalled()->willReturn([]);
        $requestResolver->getCurrentRequest()->shouldBeCalled()->willReturn($request);

        $this->resolve()->shouldReturn([]);
    }
}
