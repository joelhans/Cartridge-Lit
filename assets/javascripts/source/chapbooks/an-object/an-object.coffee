reader_name = null

jQuery ($) ->

  # INIT

  win_h = $(window).height()

  # position background image
  offset = win_h - ((win_h - 800) * 2)
  console.log offset
  $('.an-object-background').css 'top', -(offset)

  bg_offset = (push) ->
    return Math.round((win_h + push) / 10) * 10

  # Frontmatter
  $('.bg-ocean-beach').css 'top', bg_offset(1800)
  # Open Water
  $('.bg-beach').css 'top', bg_offset(2100)
  # The Village of Whealbrook
  $('.bg-wood').css 'top', bg_offset(2660)
  # The Town of Roundbeck
  $('.bg-snow').css 'top', bg_offset(5160)
  $('.bg-snow-trans').css 'top', bg_offset(4200)
  $('.bg-wood-two').css 'top', bg_offset(4920)
  $('.bg-girl-one').css 'top', bg_offset(5260)
  $('.bg-girl-portal-one').css 'top', bg_offset(5200)
  # Uptaten Towers
  $('.bg-girl-two').css 'top', bg_offset(7340)
  $('.bg-girl-portal-two').css 'top', bg_offset(7280)
  $('.bg-girl-three').css 'top', bg_offset(7830)
  $('.bg-girl-portal-three').css 'top', bg_offset(7770)
  $('.bg-girl-four').css 'top', bg_offset(8420)
  $('.bg-girl-portal-four').css 'top', bg_offset(8360)
  $('.bg-girl-five').css 'top', bg_offset(8920)
  $('.bg-girl-portal-five').css 'top', bg_offset(8860)
  $('.bg-girl-six').css 'top', bg_offset(9420)
  $('.bg-girl-portal-six').css 'top', bg_offset(9360)
  # The Village of Whealbrook (II)
  $('.bg-wood-three').css 'top', bg_offset(10640)

  # set front-matter and back-matter heights
  $('.front-matter, .back-matter').height win_h

  $('.content article').each () ->
    offset = $(this).offset()
    console.log offset.top

  $('.fm-keyboard-keys').children('li').addClass('interact-option')

  # FRONT MATTER

  $('.fm-keyboard-keys-uppercase, .fm-keyboard-keys-lowercase').children().addClass('interact-option')

  # box hover
  box_hover = (target) ->
    hover_box = $('.interact-hover-box')
    target_pos = target.offset()
    hover_box.css
      width: target.css "width"
      height: target.css "height"
      left: target_pos.left
      top: target_pos.top

  $('.interact-option').on 'mouseenter', () ->
    $('.interact-hover-box').show()
    box_hover($(this))

  # loading keyboard
  $('.fm-create').click () ->
    $('.interact-hover-box').css 'transition', 'none'
    $('.fm-create-delete, .interact-hover-box').animate { opacity: '0' }, 1000, () ->
      $('.fm-keyboard').addClass 'interact-showing'
      box_hover($('.fm-keyboard-keys-uppercase').children().first())
      $('.fm-keyboard, .interact-hover-box').animate { opacity: '1' }, 1000, () ->
        $('.interact-hover-box').css 'transition', 'all 0.2s'

  # keyboard functions
  $('.fm-keyboard ul li').click () ->
    keyDown = $(this)
    nameCache = $('.fm-textarea').html()

    # If we're adding a letter.
    if !keyDown.is('.fm-keyboard-back, .fm-keyboard-end')
      name = nameCache + keyDown.html()
      $('.fm-textarea').html(name)

    # If we're deleting a letter.
    if keyDown.is('.fm-keyboard-back')
      name = nameCache.slice(0,-1)
      $('.fm-textarea').html(name)

  # ending keyboard, loading creating, loading title
  $('.fm-keyboard-end').click () ->
    nameCache = $('.fm-textarea').html()

    # if player name is empty
    if nameCache is ''
      $('.fm-enter-name').addClass('fm-enter-name-please').html 'Please enter a name.'

    # if player name isnt empty
    else
      $('.fm-player-name').html $('.fm-textarea').html()
      $('.interact-hover-box').css 'transition', 'none'
      $('.fm-keyboard, .interact-hover-box').animate { opacity: 0 }, 1000, () ->
        $('.fm-keyboard').hide()
        $('.fm-creating').addClass 'interact-showing'
        $('.interact-hover-box').css 'display', 'none'
        $('.fm-creating, .interact-hover-box').animate { opacity: 1 }, 1000, () ->
          counter = 0
          ellipses = setInterval () ->
            number = new Array(counter + 1).join('.')
            $('.fm-ellipsis').html(number)
            counter++
          , 300

          setTimeout () ->
            $('.fm-creating').animate { opacity: '0' }, 1000, () ->
              $('.fm-title').addClass 'interact-showing'
              $('.fm-title').animate { opacity: '1' }, 1000
              $('.content').fadeIn 1000
              clearInterval(ellipses)
          , 5000

  # loading respite, then acknowledgments

  $('.bm-yes').click () ->
    $('.interact-hover-box').css 'transition', 'none'
    $('.bm-continue, .interact-hover-box').animate { opacity: '0' }, 1000, () ->
      $('.bm-respite').addClass 'interact-showing'
      $('.bm-respite').animate { opacity: '1' }, 1000, () ->
        setTimeout () ->
          $('.bm-respite').animate { opacity: '0' }, 1000, () ->
            $('.bm-acknowledgments').addClass 'interact-showing'
            $('.bm-acknowledgments').animate { opacity: '1' }, 1000
        , 5000
