# Perspective POV: Google and Meta Ads Setup

The site is static HTML/CSS/JavaScript with a PHP enquiry handler. No framework,
ad account, campaign, or paid service has been added. Publish the updated files
to the existing PHP-capable hosting before testing production enquiries.

## Owner Content

| Placeholder | Location | Action |
| --- | --- | --- |
| `{{META_PIXEL_ID}}` | `marketing.js` | Replace the constant's value with your numeric Meta Pixel/Dataset ID. Empty or unresolved values send no Meta requests. |
| `{{INSTAGRAM_URL}}`, `{{FACEBOOK_URL}}` | Footer `data-social-url` attributes in the five marketing pages | Supply confirmed HTTPS studio profile URLs. Unset icons stay visible and inactive. |
| `{{TESTIMONIAL_1}}` through `{{TESTIMONIAL_3}}` | `index.html` and `services.html`, testimonials | Replace each token AND its sample paragraph with an approved client quote on both pages. |
| `{{CLIENT_NAME_1..3}}`, `{{BUSINESS_NAME_1..3}}` | Testimonial captions | Supply approved attribution. A business name alone is fine if the client prefers. |
| `{{CLIENT_LOGO_1..4}}` | Commented client-logo row | Supply approved logo image URLs and accurate alt text before enabling. |
| `{{INSTAGRAM_EMBED}}` | Commented section near the footer | Replace with your chosen embed only when needed. No embed script loads by default. |
| `{{SITE_URL}}`, `{{OG_IMAGE_URL}}` | Open Graph and Twitter tags in the homepage head | Replace before publishing with `https://perspectivepov.co.za/` and `https://perspectivepov.co.za/Assets/Images/perspective-pov-social.jpg`, or another public 1200x630 image. |

Remove the visible sample labels and placeholder notice only after all three
quotes are genuine. Do not use samples as endorsements in ads. There are no
fabricated ratings, headshots, client counts, or review schema.

## What Is Measured

| Action | Google Analytics | Meta, once configured |
| --- | --- | --- |
| Successful homepage quote, confirmed by PHP | `generate_lead` | `Lead`, `lead_type: quote_form` |
| WhatsApp click | Homepage `contact_click`, `contact_method: whatsapp` | `Lead`, `lead_type: whatsapp_click`, across marketing pages |
| Form failure | `quote_form_error` on the homepage | No Lead |
| Page visit | Existing GA4 page view | `PageView` |

WhatsApp clicks do not prove that a message was sent or that someone became a
client. Use the `lead_type` parameter to separate these from submitted quotes.
Names, emails, and message content are not sent in these custom tracking events.
No enhanced-conversion matching or server-side Conversions API is configured.

The homepage is the intended paid-ad landing page. The older services form
retains its native PHP redirect and receives campaign attribution in its email;
its redirect alone does not fire a Lead event. Loading `?status=success` directly
also does not create a conversion.

## Google Ads

1. Confirm you control GA4 property `G-GE1MPYF2PQ`, which is already in the site.
2. Publish and test a homepage enquiry. Verify that the email arrives and that
   `generate_lead` appears in GA4. Browser tests with mocked replies are not an
   email delivery test.
3. Link the correct Google Ads account to GA4 and enable Google Ads auto-tagging.
4. Mark `generate_lead` as a key event in GA4, then create/import its Google Ads
   conversion. Set it as a primary conversion for the lead campaign.
5. Keep quote-button and contact clicks secondary while evaluating lead quality.
   Do not count both a GA4 import and another Google Ads tag as primary for the
   same submitted form.
6. Use the homepage as the ad's destination. Begin with a focused Search campaign
   for your actual service area, and review searches that generated enquiries.

Google's current setup guidance:
[website conversions](https://support.google.com/google-ads/answer/16560108),
[GA4 imports and auto-tagging](https://support.google.com/google-ads/answer/10632359).

## Meta Ads: Facebook and Instagram

1. Use the studio's Facebook Page and Instagram professional account in your
   Meta business portfolio. Confirm the right Page, ad account, and website data
   source belong to the studio before selecting them for a campaign.
2. Find/create the website Pixel/Dataset in Events Manager. Put its numeric ID
   in `marketing.js` and deploy. Review your privacy disclosures and tracking
   consent setup for the audiences you will advertise to before activating it.
3. In Events Manager's testing tools, verify PageView, one `Lead` with
   `lead_type: quote_form` after a successful enquiry, and a distinct
   `Lead` with `lead_type: whatsapp_click` when opening WhatsApp.
4. Create separate conversion rules using `lead_type` if you want website forms
   and WhatsApp click intent reported or optimised separately. A general Lead
   total includes both actions, as requested in the implementation brief.
5. Build a leads campaign using the studio's Page/account identity and real work
   examples. For direct messaging, use a campaign destination connected to your
   WhatsApp Business account. The site's `wa.me` link does not connect that
   account to Ads Manager automatically.
6. Add campaign URL parameters to website ads and test the final destination.

Meta setup reference:
[Meta Pixel](https://developers.facebook.com/docs/meta-pixel/get-started/).

## Campaign Attribution

Example destination:

```text
https://perspectivepov.co.za/?utm_source=instagram&utm_medium=paid_social&utm_campaign=website_packages&utm_content=portfolio_video
```

The site captures `utm_source`, `utm_medium`, `utm_campaign`, `utm_content`,
`utm_term`, `utm_id`, `gclid`, `gbraid`, `wbraid`, and `fbclid`. Same-origin page
links carry them forward; same-page anchors retain the existing query string.
They are not added to client sites, email links, or WhatsApp links.

Session storage keeps the landing URL for the current campaign while visitors
browse. A new campaign replaces the stored attribution. With storage blocked,
the current URL still supplies campaign fields and internal links retain them.
The hidden landing field retains the full initial URL, including all query
parameters and its fragment. Avoid putting sensitive information in campaign
URLs. Enquiry emails include this visitor-supplied attribution (landing URLs
are bounded to 8192 bytes on the server), not verified evidence of a click or
purchase. PHP redirects retain the campaign parameters.

## Before Spending

- Replace the share-preview URLs, sample testimonials, and social placeholders;
  publish all new assets.
- Test a real email delivery, a failed form submission, and the WhatsApp number.
- Confirm events once in GA4 and Events Manager using your actual accounts.
- Check that ad copy matches the package price and the qualified launch timeline.
- Track qualified enquiries, quotes sent, customers won, and cost per customer.
- Submit the published `sitemap.xml` in Google Search Console and monitor indexing.

Start with a budget you can treat as a test. No traffic, lead volume, or return
has been measured or promised by this implementation.
