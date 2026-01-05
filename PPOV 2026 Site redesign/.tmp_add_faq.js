// FAQ accordion helper appended by assistant for verification
(function(){
  document.addEventListener('DOMContentLoaded', function(){
    var faqQuestions = document.querySelectorAll('.faq-item .faq-question');
    faqQuestions.forEach(function(q){
      q.addEventListener('click', function(){
        var item = q.parentElement;
        var isActive = item.classList.contains('active');
        // close all FAQ items
        document.querySelectorAll('.faq-item').forEach(function(i){ i.classList.remove('active'); });
        // toggle clicked item
        if(!isActive) item.classList.add('active');
      });
    });
  });
})();
