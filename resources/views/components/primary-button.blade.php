<button id="animatedButton" type="submit" class="btn" style="padding: 12px 30px; font-size: 18px; font-weight: bold; color: white; border: none; border-radius: 12px; transition: all 0.3s ease; box-shadow: 0 6px 10px rgba(0,0,0,0.15); background: linear-gradient(90deg, #3b82f6, #1945a5, #011f72);">
    Submit
</button>

<script>
    const btn = document.getElementById('animatedButton');

    btn.addEventListener('mouseover', () => {
        btn.style.transform = 'scale(1.1)';
        btn.style.boxShadow = '0 10px 15px rgba(0,0,0,0.25)';
    });

    btn.addEventListener('mouseout', () => {
        btn.style.transform = 'scale(1)';
        btn.style.boxShadow = '0 6px 10px rgba(0,0,0,0.15)';
    });

    let gradientPosition = 0;
    setInterval(() => {
        gradientPosition += 1;
        btn.style.background = linear-gradient(${gradientPosition}deg, #3b82f6, #2563eb, #1d4ed8);
    }, 50);
</script>


