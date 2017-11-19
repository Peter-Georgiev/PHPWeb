<?php

namespace Core;


class Session implements SessionInterface
{

  /**
   * @var callable
   */
  private $destroyer;

  /**
   * @var array
   */
  public $session;

  public function __construct(array $session, callable $destroyer)
  {
    $this->session = $session;
    $this->destroyer = $destroyer;
  }

    public function destroy(callable $destroyer)
  {
    $this->destroyer();
  }

  public function addMessage(string $text)
  {
    $this->session['messages'][] = $text;
  }

  public function getMessages()
  {
    return $this->session['messages'];
  }

}