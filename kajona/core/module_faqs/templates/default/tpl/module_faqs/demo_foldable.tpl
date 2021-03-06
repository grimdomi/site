<!-- see section "Template-API" of module manual for a list of available placeholders -->

<!-- available placeholders: faq_categories -->
<faqs_list>
    <div class="faqsList">
        <br />%%faq_categories%%
    </div>
</faqs_list>

<!-- available placeholders: faq_cat_title, faq_faqs -->
<faq_category>
    <div class="faqCategory">
        <div class="faqCategoryTitle"><h3 data-kajona-editable="%%faq_cat_systemid%%#strTitle#plain">%%faq_cat_title%%</h3></div>
        %%faq_faqs%%
    </div>
</faq_category>

<!-- available placeholders: faq_question, faq_answer, faq_systemid, faq_rating (if module rating installed) -->
<faq_faq>
    <div class="faqFaq">
        <div class="faqFaqQuestion">
            <table cellspacing="0" class="portalList">
                <tr class="portalListRow1">
                    <td class="image"><img src="_webpath_/templates/default/pics/default/icon_question.gif" /></td>
                    <td class="title"><a href="#" onclick="KAJONA.util.fold('%%faq_systemid%%'); return false;" data-kajona-editable="%%faq_systemid%%#strQuestion#plain">%%faq_question%%</a></td>
                    <td class="rating">%%faq_rating%%</td>
                </tr>
            </table>
        </div>
        <div class="faqFaqAnswer" id="%%faq_systemid%%" style="display: none;" ><a name="%%faq_systemid%%"></a><span data-kajona-editable="%%faq_systemid%%#strAnswer">%%faq_answer%%</span></div>
    </div>
</faq_faq>

