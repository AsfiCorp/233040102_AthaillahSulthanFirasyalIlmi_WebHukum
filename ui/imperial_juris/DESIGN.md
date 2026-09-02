---
name: Imperial Juris
colors:
  surface: '#111415'
  surface-dim: '#111415'
  surface-bright: '#373a3b'
  surface-container-lowest: '#0c0f10'
  surface-container-low: '#191c1d'
  surface-container: '#1d2021'
  surface-container-high: '#282a2b'
  surface-container-highest: '#323536'
  on-surface: '#e1e3e4'
  on-surface-variant: '#c6c6ce'
  inverse-surface: '#e1e3e4'
  inverse-on-surface: '#2e3132'
  outline: '#909098'
  outline-variant: '#45464d'
  surface-tint: '#bec5e5'
  primary: '#bec5e5'
  on-primary: '#282f49'
  primary-container: '#0b132b'
  on-primary-container: '#767e9b'
  inverse-primary: '#565d79'
  secondary: '#e9c349'
  on-secondary: '#3c2f00'
  secondary-container: '#af8d11'
  on-secondary-container: '#342800'
  tertiary: '#bdc5e9'
  on-tertiary: '#262f4c'
  tertiary-container: '#09132e'
  on-tertiary-container: '#757e9f'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#dbe1ff'
  primary-fixed-dim: '#bec5e5'
  on-primary-fixed: '#131a33'
  on-primary-fixed-variant: '#3e4660'
  secondary-fixed: '#ffe088'
  secondary-fixed-dim: '#e9c349'
  on-secondary-fixed: '#241a00'
  on-secondary-fixed-variant: '#574500'
  tertiary-fixed: '#dbe1ff'
  tertiary-fixed-dim: '#bdc5e9'
  on-tertiary-fixed: '#111a36'
  on-tertiary-fixed-variant: '#3d4664'
  background: '#111415'
  on-background: '#e1e3e4'
  surface-variant: '#323536'
typography:
  display-lg:
    fontFamily: Playfair Display
    fontSize: 64px
    fontWeight: '700'
    lineHeight: 72px
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Playfair Display
    fontSize: 40px
    fontWeight: '700'
    lineHeight: 48px
    letterSpacing: -0.01em
  headline-lg:
    fontFamily: Playfair Display
    fontSize: 40px
    fontWeight: '600'
    lineHeight: 48px
  headline-md:
    fontFamily: Playfair Display
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-caps:
    fontFamily: Inter
    fontSize: 12px
    fontWeight: '600'
    lineHeight: 16px
    letterSpacing: 0.1em
spacing:
  unit: 8px
  container-max: 1280px
  gutter: 32px
  margin-mobile: 20px
  section-gap: 120px
---

## Brand & Style
The design system is engineered for a premium, authoritative legal presence. It balances the weight of tradition with the precision of modern high-end service. The target audience includes high-net-worth individuals and corporate entities seeking stability and uncompromising expertise.

The design style is **Corporate / Modern** with **Minimalist** leanings. It utilizes heavy whitespace (specifically "dark space"), high-contrast typography, and subtle metallic accents to evoke a sense of exclusivity. The emotional response is one of security, intelligence, and prestige.

## Colors
The palette is dominated by Deep Navy Blue (`#0B132B`), serving as the primary foundation to establish authority. Premium Metallic Gold (`#D4AF37`) is reserved strictly for primary actions, subtle borders, and key highlights to maintain its "precious" feel.

- **Primary Background**: Deep Navy Blue.
- **Surface/Container**: A slightly lighter navy (`#1C2541`) to create depth.
- **Accents**: Gold is used for high-importance interactions.
- **Typography**: Crisp white for headings on dark backgrounds; Off-white (`#E0E1DD`) for long-form body text to reduce eye strain.

## Typography
This design system employs a sophisticated serif-sans pairing. **Playfair Display** provides the "editorial" authority required for legal headers, while **Inter** ensures maximum legibility for complex legal documentation and fine print.

Large display headings should use tighter letter-spacing to feel more cohesive. Small labels and category tags should always be in uppercase with generous tracking to emulate high-fashion or luxury brand signals.

## Layout & Spacing
The layout follows a **Fixed Grid** model for desktop to ensure content remains centered and prestigious, moving to a fluid model for mobile.

- **Desktop**: 12-column grid with 32px gutters. Large vertical gaps (120px+) between sections are encouraged to provide "breathing room" and emphasize importance.
- **Tablet**: 8-column grid with 24px margins.
- **Mobile**: 4-column grid with 20px margins.

Content should often be asymmetrical; for example, a headline spanning 8 columns with the remaining 4 columns left empty to create a minimalist, high-end aesthetic.

## Elevation & Depth
In this dark-themed system, depth is conveyed through **Tonal Layers** rather than heavy shadows. 

- **Level 0**: Base background (`#0B132B`).
- **Level 1**: Card surfaces and modals use a subtle shift to `#1C2541`.
- **Accents**: Depth is further defined by 1px solid borders in low-opacity Gold or muted Navy. 
- **Shadows**: When used, shadows should be ultra-soft, using a darker shade of navy (`#050812`) with a 20% opacity and large blur radius (30px+) to avoid a "muddy" look.

## Shapes
To maintain a serious and institutional feel, this design system utilizes **Sharp** (0px) corners. Sharp edges convey precision, discipline, and the "unbending" nature of the law. 

Geometric integrity is paramount. If containers require separation, use 1px hairlines rather than rounded enclosures.

## Components

### Buttons
- **Primary**: Solid Gold background, Navy text, uppercase Inter, bold. No rounding.
- **Secondary**: Ghost style with 1px Gold border and Gold text.
- **Hover State**: Primary buttons should shift to a slightly lighter Gold; Secondary buttons should gain a subtle Navy fill.

### Cards
- **Profile Cards**: Use high-contrast photography (Black & White recommended). On hover, a subtle Gold bottom-border slides in from the center.
- **News Grid**: Minimalist cards with no borders; separation is achieved through padding and the Level 1 surface color. Typography-heavy.

### Navigation
- **Sticky Navbar**: Background is semi-transparent Navy with a `backdrop-filter: blur(10px)`. A 1px Gold bottom border should appear only when scrolling.

### Forms
- **Input Fields**: Bottom-border only (1px Muted Navy). When focused, the border transitions to Gold. Labels use the `label-caps` style for a refined look.
- **Checkboxes**: Square, sharp corners. Gold fill when checked.

### Lists
- Use Gold horizontal rules (hairlines) between list items to maintain the structural grid feel.