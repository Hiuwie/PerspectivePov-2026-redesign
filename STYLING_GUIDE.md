# PPOV 2026 Site Redesign - Styling Guide

## Brand Colors & CSS Variables

### Color Palette (from colours.scss)
```
$ppov-orange-one: #F04115        (Brand Primary - Orange)
$ppov-lighgrey: #FAFAFA           (Light Grey Background)
$ppov-black: #0d0d0d              (Dark Text/Background)
$ewhite: #FFFFFF                  (Pure White)
$eblack: #000000                  (Pure Black)
$ppov-grey-one: #D9D9D9           (Light Grey Border)
$ppov-grey-two: #8C8C8C           (Medium Grey)
$ppov-grey-three: #595959         (Dark Grey)
$ppov-grey-four: #262626          (Very Dark Grey)
```

### CSS Custom Properties (Light Mode)
```css
--bg-primary: #FFFFFF             (Page Background)
--bg-secondary: #FAFAFA           (Secondary Background)
--text-primary: #0d0d0d           (Main Text Color)
--text-secondary: #595959         (Secondary Text)
--text-tertiary: #8C8C8C          (Tertiary Text/Labels)
--accent-color: #F04115           (Brand Orange - CTAs, Important Elements)
--accent-dark: #d63909            (Dark Orange - Hover States)
--border-light: #D9D9D9           (Card/Element Borders)
--card-bg: #FFFFFF                (Card Backgrounds)
```

### CSS Custom Properties (Dark Mode - prefers-color-scheme: dark)
```css
--bg-primary: #0d0d0d             (Dark Background)
--bg-secondary: #1a1a1a           (Slightly Lighter Background)
--text-primary: #FFFFFF           (Light Text)
--text-secondary: #D9D9D9         (Secondary Light Text)
--text-tertiary: #8C8C8C          (Tertiary Text - Remains Same)
--accent-color: #FF5722           (Brighter Orange for Dark Mode)
--accent-dark: #F04115            (Original Orange for Dark Hover)
--border-light: #404040           (Dark Border)
--card-bg: #1a1a1a                (Dark Card Background)
```

## Typography

### Fonts Used
- **Primary Font:** Montserrat (sans-serif)
- **Secondary Font:** Roboto (sans-serif)
- **Font Stack:** Montserrat, Roboto, sans-serif

### Typography Scale
- **Page Title/Hero Headline:** 2.8em, font-weight: 700
- **Subheadline:** 1.1em, font-weight: 400
- **Card Title (h4):** 1.1em, font-weight: 600
- **Body Text/Card Description:** 0.9-0.95em, font-weight: 400
- **Tertiary/Labels:** 0.85-0.9em, color: var(--text-tertiary)

### Line Heights
- **Headlines:** 1.2-1.3em
- **Body Text:** 1.4-1.7em
- **Subheadlines:** 1.6-1.7em

## Component Styling Standards

### Buttons
**Primary Button (.cta-primary)**
- Background: `linear-gradient(135deg, var(--accent-color) 0%, var(--accent-dark) 100%)`
- Color: #FFFFFF
- Padding: 16px 40px
- Border-radius: 6px
- Box-shadow: 0 6px 20px rgba(240, 65, 21, 0.3)
- Hover: Lift up (-3px), enhanced shadow, shine effect
- Transition: all 0.3s ease

**Secondary Button (.cta-secondary)**
- Background: transparent
- Border: 2px solid var(--accent-color)
- Color: var(--accent-color)
- Padding: 16px 40px
- Border-radius: 6px
- Hover: Background fills with accent color, text becomes white
- Transition: all 0.3s ease

### Cards
**Trust Card (.trust-card)**
- Background: `linear-gradient(135deg, var(--card-bg) 0%, rgba(240, 65, 21, 0.05) 100%)`
- Border: 1px solid var(--border-light)
- Border-radius: 12px
- Padding: 1.5rem
- Box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05)
- Hover: Lift up (-8px), enhanced shadow, border highlight
- Display: flex, flex-direction: column, align-items: center
- Text-align: center
- Transition: all 0.3s ease

**Trust Card Icon (.trust-card-icon)**
- Width/Height: 60px
- Background: `linear-gradient(135deg, #8C8C8C 0%, #595959 100%)`
- Border-radius: 50%
- Box-shadow: 0 4px 12px rgba(140, 140, 140, 0.3)
- Dark Mode: Brighter gradient (#A0A0A0 to #707070)
- Hover: Scale 1.1

### Spacing Standards
- **Large Gap/Margin:** 3rem, 3.5rem
- **Medium Gap/Margin:** 2rem, 2.5rem
- **Standard Gap/Margin:** 1.5rem, 1.6rem
- **Small Gap/Margin:** 1rem, 1.2rem
- **Padding (Cards):** 1.5rem, 1.2rem (mobile)
- **Container Padding:** 0 2rem (desktop), 0 1.5rem (mobile)

## Animation Standards

### Keyframe Animations
**fadeInDown** - Used for headlines
- Duration: 0.8s, ease-out, forwards
- From: opacity 0, translateY(-30px)
- To: opacity 1, translateY(0)

**fadeInUp** - Used for body content, buttons, indicators
- Duration: 0.8s, ease-out, forwards
- From: opacity 0, translateY(30px)
- To: opacity 1, translateY(0)

**fadeInLeft** - Used for images
- Duration: 0.8s, ease-out, forwards
- From: opacity 0, translateX(-40px)
- To: opacity 1, translateX(0)

**fadeInRight** - Available for future use
- Duration: 0.8s, ease-out, forwards
- From: opacity 0, translateX(40px)
- To: opacity 1, translateX(0)

**float** - Used for background decorative elements
- Duration: 6s, ease-in-out, infinite
- Floating motion: translateY(0px) → translateY(20px) → translateY(0px)

### Animation Delays (Staggered)
- `.animate-fade-in`: 0s (immediate)
- `.animate-fade-in-left`: 0s (immediate)
- `.animate-fade-in-delayed`: 0.2s
- `.animate-fade-in-delayed-2`: 0.4s
- `.animate-fade-in-delayed-3`: 0.6s

### Transition Standards
- **Default Transition:** all 0.3s ease
- **Hover Effects:** 0.3s ease
- **Button Shine:** 0.5s (left slide)
- **Color Changes:** 0.3s ease

## Layout Standards

### Hero Section
- **Min-height:** 100vh
- **Padding:** 80px top (accounts for navbar)
- **Display:** Grid with 2 columns on desktop
- **Gap:** 3rem
- **Background:** Linear gradient + floating orb animation
- **Responsive:** Single column below 1024px

### Grid Systems
- **Hero Content:** `grid-template-columns: 1fr 1fr` (desktop)
- **Hero Trust Indicators:** `grid-template-columns: repeat(3, 1fr)` (desktop)
- **Responsive Breakpoints:**
  - Desktop: 1024px+
  - Tablet: 768px - 1024px
  - Mobile: 576px - 768px
  - Small Mobile: <576px

### Box Model
- **Border-radius (Buttons):** 6px
- **Border-radius (Cards):** 12px
- **Border-radius (Icons):** 50% (circles)
- **Box-shadow (Buttons):** 0 6px 20px rgba(...)
- **Box-shadow (Cards):** 0 2px 8px rgba(0, 0, 0, 0.05)
- **Box-shadow (Icons):** 0 4px 12px rgba(...)

## Responsive Design

### Breakpoints
```css
/* Desktop: 1024px+ */
Default/Full Styling

/* Tablet: 768px - 1024px */
- Single column layout
- 2em headlines
- Adjusted spacing

/* Mobile: 576px - 768px */
- Full responsive
- 1.8em headlines
- Stacked buttons
- Single column cards

/* Small Mobile: <576px */
- 1.5em headlines
- Centered text
- Optimized padding
- Small icon sizes (50px → 50px)
```

## Dark Mode Implementation

### How It Works
- Uses CSS `@media (prefers-color-scheme: dark)` media query
- Automatically detects system preference
- localStorage saves user preference (in script.js)
- Smooth color transitions (0.3s)
- All colors defined via CSS variables for easy switching

### Key Changes in Dark Mode
- Darker backgrounds
- Lighter text colors
- Slightly brightened accents for visibility
- Adjusted shadows and borders
- Gradient overlays adjusted for contrast

## Brand Color Usage Guidelines

### Orange (#F04115) - Reserved for:
✓ Primary Call-to-Action Buttons
✓ Main Links & Highlights
✓ Icon Accents (in specific contexts)
✓ Border Highlights on Hover
✗ Background Colors
✗ Body Text
✗ Trust Indicator Icons (Use greyscale instead)

### Greyscale (#8C8C8C, #595959) - Used for:
✓ Trust Indicator Icons
✓ Secondary Elements
✓ Body Text (grey-three)
✓ Labels & Tertiary Information
✓ Borders

### White (#FFFFFF) - Used for:
✓ Primary Backgrounds
✓ Card Backgrounds (light mode)
✓ Button Text
✓ Checkmarks/Icons Inside Colored Badges

## CSS Variables Usage Rules

### Always Use Variables For:
- Text Colors
- Background Colors
- Border Colors
- Box Shadows (except decorative)
- Accent Colors
- Typography Colors

### Never Hardcode:
- Color values (except in specific gradients or brand-required cases)
- Background colors (use variables)
- Text colors (use variables)

### Exception Cases:
- White text in colored elements (#FFFFFF)
- Specific gradient components where both light/dark modes are defined

## File Structure

### Key Files
- **index.html** - HTML structure (hero section, components)
- **stylesheet.css** - All styling with CSS variables and dark mode
- **script.js** - Dark mode detection and smooth scrolling
- **colours.scss** - Brand color definitions
- **STYLING_GUIDE.md** - This guide (consistency reference)

## Future Enhancement Checklist

When adding new components, ensure:
- [ ] Uses CSS variables for colors
- [ ] Has dark mode support via media query
- [ ] Follows 6px or 12px border-radius standard
- [ ] Includes appropriate animations (0.3s transitions)
- [ ] Responsive breakpoint rules applied
- [ ] Proper spacing using standard gaps
- [ ] Typography follows scale guidelines
- [ ] Only uses brand orange intentionally
- [ ] Tested in both light and dark modes
- [ ] Mobile/tablet/desktop layouts verified

---

**Last Updated:** 11 December 2025
**Maintained Consistency:** Hero Section, Trust Indicators, Navigation, Dark Mode
